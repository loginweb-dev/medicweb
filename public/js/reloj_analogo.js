function Reloj(hour, minutes) {
    this.canvas=document.getElementById('reloj');
    this.canvas.width=200;
    this.canvas.height=200;
    this.ctx = this.canvas.getContext('2d');

    this.setHora(hour, minutes);
    var self=this;
    this.intervalo = self.actualizar();
}
Reloj.prototype.setHora=function(hour, minutes){
    var hora = new Date
    this.segundos = 0;
    this.minutos = minutes;
    this.horas = hour;

    this.rad12=2*Math.PI/12;
    this.rad60=2*Math.PI/60;
}
Reloj.prototype.dibujar=function()
{
    this.ctx.clearRect(0,0,200,200);
    this.ctx.lineWidth = 10;
    this.ctx.strokeStyle = "#222D40";
    this.ctx.beginPath();
    this.ctx.arc(100, 100, 95, 0, 2 * Math.PI, false);
    this.ctx.stroke();

    this.ctx.save();
    this.ctx.translate(100,100);

    this.ctx.font = "bold 20px monospace";
    this.ctx.fillStyle="#222D40";
    this.ctx.fillText(12,-12,-70);
    this.ctx.fillText(6,-6,82);
    this.ctx.fillText(1,32,-58);
    this.ctx.fillText(7,-45,70);
    this.ctx.fillText(2,60,-32);
    this.ctx.fillText(8,-72,46);
    this.ctx.fillText(3,70,5);
    this.ctx.fillText(9,-82,5);
    this.ctx.fillText(4,60,47);
    this.ctx.fillText(10,-71,-33);
    this.ctx.fillText(5,33,72);
    this.ctx.fillText(11,-47,-57);

    for (var i=0;i<6;i++)
    {
        this.ctx.save();
        this.ctx.rotate(i*this.rad12);
        this.ctx.lineWidth = 4;
        this.ctx.strokeStyle = "#5286E2";
        this.ctx.beginPath();
        this.ctx.moveTo(0,-85);
        this.ctx.lineTo(0,-95);
        this.ctx.stroke();
        this.ctx.beginPath();
        this.ctx.moveTo(0,85);
        this.ctx.lineTo(0,95);
        this.ctx.stroke();
        this.ctx.restore();
    }

    this.ctx.save();
    this.ctx.rotate(this.horas*this.rad12+this.minutos/60*this.rad12);
    this.ctx.lineWidth = 7;
    this.ctx.strokeStyle = "#5286E2";
    this.ctx.beginPath();
    this.ctx.moveTo(0,7);
    this.ctx.lineTo(0,-60);
    this.ctx.stroke();
    this.ctx.restore();

    this.ctx.save();
    this.ctx.rotate(this.minutos*this.rad60+this.segundos/60*this.rad60);
    this.ctx.lineWidth = 4;
    this.ctx.strokeStyle = "#222D40";
    this.ctx.beginPath();
    this.ctx.moveTo(0,10);
    this.ctx.lineTo(0,-70);
    this.ctx.stroke();
    this.ctx.restore();

    this.ctx.restore();
}
Reloj.prototype.actualizar=function(){
    this.dibujar();
} 