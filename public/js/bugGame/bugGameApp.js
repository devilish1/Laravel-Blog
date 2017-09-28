// Enemies our player must avoid
var Enemy = function(x, y) {
    // Variables applied to each of our instances go here,
    // we've provided one for you to get started
    // The image/sprite for our enemies, this uses
    // a helper we've provided to easily load images
    this.sprite = 'images/enemy-bug.png';
    this.x = x;
    this.y = y;
    this.fieldX = -1;
    this.fieldY = -1;
    this.minSpeed = 100;
    this.maxSpeed = 1200;
    this.speed = this.minSpeed + Math.floor(Math.random() * this.maxSpeed);
};
// Update the enemy's position, required method for game
// Parameter: dt, a time delta between ticks
Enemy.prototype.update = function(dt) {
    // You should multiply any movement by the dt parameter
    // which will ensure the game runs at the same speed for
    // all computers.
    this.x += dt * this.speed;
    if (this.x >= window.enemyLimits.end) {
        this.x = window.enemyLimits.start - Math.floor(Math.random() * 400);
        this.speed = this.minSpeed + Math.floor(Math.random() * this.maxSpeed);
    }
    this.calculateField();
};
// Draw the enemy on the screen, required method for game
Enemy.prototype.render = function() {
    ctx.drawImage(Resources.get(this.sprite), this.x, this.y);
};
// Checkes in which field the enemy is
Enemy.prototype.calculateField = function() {
    this.fieldX = Math.floor((this.x - 15) / 100) + 1;
    switch (this.y) {
        case 60:
            this.fieldY = 1;
            break;
        case 145:
            this.fieldY = 2;
            break;
        case 230:
            this.fieldY = 3;
            break;
    }
};
// Now write your own player class
// This class requires an update(), render() and
// a handleInput() method.
var Player = function() {
    this.sprite = 'images/char-boy.png';
    this.x = 2;
    this.y = 5;
    this.score = 0;
}
// Update the player's position
// Parameter: dt, a time delta between ticks
Player.prototype.update = function(score) {
    this.score += score;
}
Player.prototype.handleInput = function(keyCode) {
    // var jumpDiogonal = 82;
    // var jumpHorizontal = 100;
    switch (keyCode) {
        case 'up':
            this.y -= 1;
            if (this.y < 0) {
                this.y = 0;
            }
            break;
        case 'down':
            this.y += 1;
            if (this.y > 5) {
                this.y = 5;
            }
            break;
        case 'left':
            this.x -= 1;
            if (this.x < 0) {
                this.x = 0;
            }
            break;
        case 'right':
            this.x += 1;
            if (this.x > 4) {
                this.x = 4;
            }
            break;
            //should`t happen
        default:
            console.log('wrong key');
    }
}
Player.prototype.render = function() {
    ctx.drawImage(Resources.get(this.sprite), this.x * 100, this.y * 82 - 5);
    ctx.font = "30px Georgia";
    ctx.fillStyle = "#FF0000";
    ctx.fillText('Score: ' + this.score, 350, 550);
}
/* if the enemy touches you, the game restarts your position
 */
Player.prototype.restart = function() {
    this.x = 2;
    this.y = 5;
}
// Now instantiate your objects.
// Place all enemy objects in an array called allEnemies
// Place the player object in a variable called player
player = new Player();
enemyPosition = [60, 145, 230];
allEnemies = [];
allEnemies.push(new Enemy(Math.floor(Math.random() * 500), enemyPosition[0]), new Enemy(Math.floor(Math.random() * 500), enemyPosition[1]), new Enemy(Math.floor(Math.random() * 500), enemyPosition[2]));
// This listens for key presses and sends the keys to your
// Player.handleInput() method. You don't need to modify this.
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if ([37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);
document.addEventListener('keyup', function(e) {
    console.log('test');
    var allowedKeys = {
        37: 'left',
        38: 'up',
        39: 'right',
        40: 'down'
    };
    e.preventDefault();
    player.handleInput(allowedKeys[e.keyCode]);
});