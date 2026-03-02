import Phaser from "phaser";

var config = {
  type: Phaser.AUTO,
  width: 800,
  height: 600,
  physics: {
    default: "arcade",
    arcade: {
      gravity: { y: 0 },
      debug: false,
    },
  },
  scene: {
    preload: preload,
    create: create,
    update: update,
  },
};

var game = new Phaser.Game(config);

function preload() {
  this.load.image("victoria", "assets/victoria.png");
  this.load.image("fondoNegro", "assets/fondoNegro.png");
  this.load.image("ground", "assets/platformBlue.png");
  this.load.image("star", "assets/star.png");
  this.load.spritesheet("dude", "assets/dude.png", {
    frameWidth: 32,
    frameHeight: 48,
  });
}

var player;
var platforms;
var stars;
var victoria;
var cursors;
var estrellasCOntador = 0;
const puntoInicioX = 100;
const puntoInicioY = 505;
const velocidad = 99;

function create() {
  this.add.image(400, 300, "fondoNegro");
  platforms = this.physics.add.staticGroup();
  platforms.create(400, 568, "ground").setScale(2).refreshBody();
  platforms.create(600, 400, "ground");
  platforms.create(140, 220, "ground");
  platforms.create(650, 180, "ground");
  platforms.create(550, 40, "ground");
  platforms.create(650, 120, "ground");
  platforms.create(650, 320, "ground");
  platforms.create(-50, 320, "ground");
  platforms.create(150, 150, "ground");
  platforms.create(70, 100, "ground");
  platforms.create(120, 460, "ground");

  stars = this.physics.add.group();
  const estrellas = [
    { x: 230, y: 300 },
    { x: 680, y: 280 },
    { x: 380, y: 380 },
    { x: 580, y: 480 },
    { x: 380, y: 200 },
    { x: 410, y: 130 },
    { x: 310, y: 70 },
  ];

  estrellas.forEach((pos) => {
    stars.create(pos.x, pos.y, "star");
  });
  victoria = this.physics.add.staticSprite(30, -40, "victoria");

  player = this.physics.add.sprite(puntoInicioX, puntoInicioY, "dude");
  player.setCollideWorldBounds(true);
  player.body.velocity.x = velocidad;

  this.anims.create({
    key: "left",
    frames: this.anims.generateFrameNumbers("dude", { start: 0, end: 3 }),
    frameRate: 10,
    repeat: -1,
  });
  this.anims.create({
    key: "turn",
    frames: [{ key: "dude", frame: 4 }],
    frameRate: 20,
  });
  this.anims.create({
    key: "right",
    frames: this.anims.generateFrameNumbers("dude", { start: 5, end: 8 }),
    frameRate: 10,
    repeat: -1,
  });

  this.physics.add.collider(
    player,
    platforms,
    function () {
      player.setPosition(puntoInicioX, puntoInicioY);
      player.setScale(1);
      estrellasCOntador = 0;
    },
    null,
    this,
  );
  // don alberto me parece que no llegamos a ver overlap, ç
  // pero es para colisiones buscado por apuntes de google.

  this.physics.add.overlap(
    player,
    stars,
    (p, star) => {
      star.disableBody(true, true);
      estrellasCOntador++;
      p.setScale(p.scaleX * 1.2, p.scaleY * 1.2);
    },
    null,
    this,
  );
  this.physics.add.overlap(
    player,
    victoria,
    () => {
      if (estrellasCOntador >= 7) {
        alert("¡Nivel Completado!");
      }
    },
    null,
    this,
  );
  cursors = this.input.keyboard.createCursorKeys();
}

function update() {
  if (cursors.left.isDown) {
    player.setVelocityX(-velocidad);
    player.setVelocityY(0);
    player.anims.play("left", true);
  } else if (cursors.right.isDown) {
    player.setVelocityX(velocidad);
    player.setVelocityY(0);
    player.anims.play("right", true);
  } else if (cursors.up.isDown) {
    player.setVelocityX(0);
    player.setVelocityY(-velocidad);
  } else if (cursors.down.isDown) {
    player.setVelocityX(0);
    player.setVelocityY(velocidad);
  }
}
