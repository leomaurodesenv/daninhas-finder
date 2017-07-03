<?php require('./php/top.php'); ?>
<div class="body-content container">

	<h3 class="false-title">Map <small>- Geographic Information System</small></h3>

    <p>Clique aqui para tocar: <img class="playerRobot" src="img/volume.png"></p>
    
	<div class="row">
        
        <a href="info.php?robot={{item.id}}&events={{item.events}}" target="_blank" ng-repeat="item in robots.itens" class="col-sm-2 col-xs-4 grid-area">
            <div class="grid-area-indor {{item.bg}}">
                <p>Robot {{item.id}}</p>
                <p>Local {{item.locale}}</p>
                <p>{{item.events}} - {{item.per}}%</p>
            </div>
		</a>
        
	</div>
    
</div>

<script>
// Simple Example of play sound
$('.playerRobot').click(function(){
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices[2]; // Note: some voices don't support altering params 2, 10
    msg.voiceURI = 'native';
    msg.volume = 1; // 0 to 1
    msg.rate = 1; // 0.1 to 10
    msg.pitch = 1; //0 to 2
    msg.text = 'Robô '+window.robot0.id+', '+window.robot0.events+' ocorrencias, região '+window.robot0.per+'% afetada';
    msg.lang = 'pt-BR';
    speechSynthesis.speak(msg);
});

</script>

<?php require('./php/bottom.php'); ?>