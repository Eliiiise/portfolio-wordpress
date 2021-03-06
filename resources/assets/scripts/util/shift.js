'use strict';

import SimplexNoise from 'simplex-noise';

const { PI, cos, sin, abs, random } = Math;
const circleCount = 150;
const circlePropCount = 8;
const circlePropsLength = circleCount * circlePropCount;
const baseSpeed = 0.01;
const rangeSpeed = 1;
const baseTTL = 150;
const rangeTTL = 200;
const baseRadius = 100;
const rangeRadius = 200;
const rangeHue = 60;
const xOff = 0.0015;
const yOff = 0.0015;
const zOff = 0.0015;
const backgroundColor = 'hsl(239,57%,42%)'; // 'hsla(0,0%,5%,1)'
const TAU = 2 * PI;
const fadeInOut = (t, m) => {
  let hm = 0.5 * m;
  return abs((t + hm) % m - hm) / (hm);
};
const rand = n => n * random();

let container;
let canvas;
let ctx;
let circleProps;
let simplex;
let baseHue;

export default {
  init() {
    this.bindMethods()
    // this.initEls()
    this.initEvents()
  },

  bindMethods() {
    this.setup = this.setup.bind(this)
    this.resize = this.resize.bind(this)
    this.draw = this.draw.bind(this)
  },

  initEls() {
    this.favicon = document.querySelector('link[rel*="icon"]')
  },

  initEvents() {
    window.addEventListener('load', this.setup);
    window.addEventListener('resize', this.resize);
  },

  setup() {
    this.createCanvas();
    this.resize();
    this.initCircles();
    this.draw();
  },

  initCircles() {
    circleProps = new Float32Array(circlePropsLength);
    simplex = new SimplexNoise();
    baseHue = 220;

    let i;

    for (i = 0; i < circlePropsLength; i += circlePropCount) {
      this.initCircle(i);
    }
  },

  initCircle(i) {
    let x, y, n, t, speed, vx, vy, life, ttl, radius, hue;

    x = rand(canvas.a.width);
    y = rand(canvas.a.height);
    n = simplex.noise3D(x * xOff, y * yOff, baseHue * zOff);
    t = rand(TAU);
    speed = baseSpeed + rand(rangeSpeed);
    vx = speed * cos(t);
    vy = speed * sin(t);
    life = 0;
    ttl = baseTTL + rand(rangeTTL);
    radius = baseRadius + rand(rangeRadius);
    hue = baseHue + n * rangeHue;

    circleProps.set([x, y, vx, vy, life, ttl, radius, hue], i);
  },

  updateCircles() {
    let i;

    baseHue++;

    for (i = 0; i < circlePropsLength; i += circlePropCount) {
      this.updateCircle(i);
    }
  },

  updateCircle(i) {
    let i2=1+i, i3=2+i, i4=3+i, i5=4+i, i6=5+i, i7=6+i, i8=7+i;
    let x, y, vx, vy, life, ttl, radius, hue;

    x = circleProps[i];
    y = circleProps[i2];
    vx = circleProps[i3];
    vy = circleProps[i4];
    life = circleProps[i5];
    ttl = circleProps[i6];
    radius = circleProps[i7];
    hue = circleProps[i8];

    this.drawCircle(x, y, life, ttl, radius, hue);

    life++;

    circleProps[i] = x + vx;
    circleProps[i2] = y + vy;
    circleProps[i5] = life;

    (this.checkBounds(x, y, radius) || life > ttl) && this.initCircle(i);
  },

  drawCircle(x, y, life, ttl, radius, hue) {
    ctx.a.save();
    if (hue%360 > 30 && hue%360 < 120) {
      hue = hue - 90
    }
    if (hue%360 > 120 && hue%360 < 210) {
      hue = hue + 90
    }
    ctx.a.fillStyle = `hsla(${hue},99%,50%,${fadeInOut(life,ttl)})`; // `hsla(${hue},60%,30%,${fadeInOut(life,ttl)})
    ctx.a.beginPath();
    ctx.a.arc(x,y, radius, 0, TAU);
    ctx.a.fill();
    ctx.a.closePath();
    ctx.a.restore();
  },

  checkBounds(x, y, radius) {
    return (
      x < -radius ||
      x > canvas.a.width + radius ||
      y < -radius ||
      y > canvas.a.height + radius
    );
  },

  createCanvas() {
    container = document.querySelector('.js-canvas');
    canvas = {
      a: document.createElement('canvas'),
      b: document.createElement('canvas'),
    };
    canvas.b.style = `
		width: 80px;
		height: 80px;
		border-radius: 50%;
	`;
    container.appendChild(canvas.b);
    ctx = {
      a: canvas.a.getContext('2d'),
      b: canvas.b.getContext('2d'),
    };
  },

  resize() {
    const { innerWidth, innerHeight } = window;

    canvas.a.width = innerWidth;
    canvas.a.height = innerHeight;

    ctx.a.drawImage(canvas.b, 0, 0);

    canvas.b.width = 700;
    canvas.b.height = 700;

    ctx.b.drawImage(canvas.a, 0, 0);
  },

  render() {
    ctx.b.save();
    ctx.b.filter = 'blur(50px)';
    ctx.b.drawImage(canvas.a, 0, 0);
    ctx.b.restore();
  },

  draw() {
    ctx.a.clearRect(0, 0, canvas.a.width, canvas.a.height);
    ctx.b.fillStyle = backgroundColor;
    ctx.b.fillRect(0, 0, canvas.b.width, canvas.b.height);
    this.updateCircles();
    this.render();
    // this.favicon.href = canvas.b.toDataURL('image/png');
    window.requestAnimationFrame(this.draw);
  },
}
