(function(){
	var app = angular.module('robots', []);
	app.controller('Robots', function($scope, $http, $interval){
        // Chama a Lista de robox default
		this.itens = robots;
        window.robot0 = robots[0];
        
        /*$http.get('https://api.xively.com/v2/feeds/56185000?key=KqdcJ7M2h2xd9URUn5fPiuGwoSGC8qNiMyPP0DYYhY5sDeUB').then(function(response){
            var ansXi = response.data,
            dataXi = {"id":ansXi.datastreams[0].id, "current_value":parseFloat(ansXi.datastreams[0].current_value), "at":ansXi.datastreams[0].at}; 
            // Caso a requisisão seja de outro tempo, atualize o sistema
            if(dataXi.at != robots[0].at){
                robots[0].events = 10;
                robots[0].at = dataXi.at;
                robots[0].per = Math.round10((robots[0].events/maxEvents) * 100, -1);
                robots[0].bg = 
                    (robots[0].per < 25.0) ? 'c0' : 
                    (robots[0].per < 50.0) ? 'c25' :
                    (robots[0].per < 75.0) ? 'c50' :
                    (robots[0].per < 100.0) ? 'c75' : 'c100';
            }
        });*/
        
        // Atualizar Lista de Eventos
        /*
        $http.get('./robots/robot1.json').then(function(response){
            var ans = response.data; 
            robots[0].events = ans.length;
            robots[0].at = ans[ans.length-1].at;
            robots[0].per = Math.round10((robots[0].events/maxEvents) * 100, -1);
            robots[0].bg = 
                (robots[0].per < 25.0) ? 'c0' : 
                (robots[0].per < 50.0) ? 'c25' :
                (robots[0].per < 75.0) ? 'c50' :
                (robots[0].per < 100.0) ? 'c75' : 'c100';
            
            $http.get('https://api.xively.com/v2/feeds/56185000?key=KqdcJ7M2h2xd9URUn5fPiuGwoSGC8qNiMyPP0DYYhY5sDeUB').then(function(response){
                var ansXi = response.data,
                dataXi = {"id":ansXi.datastreams[0].id, "current_value":parseFloat(ansXi.datastreams[0].current_value), "at":ansXi.datastreams[0].at}; 
                // Caso a requisisão seja de outro tempo, atualize o sistema
                if(dataXi.at != robots[0].at){
                    ans.push(dataXi);
                    //var strBlob = new Blob([JSON.stringify(ans)], {type : 'application/json'});
                    //saveAs(strBlob, ('./robots/robot1.json'));
                }
            });
            
        }); */
        
        $interval(function(){
            xively.setKey('KqdcJ7M2h2xd9URUn5fPiuGwoSGC8qNiMyPP0DYYhY5sDeUB');
            //xively.feed.get("56185000", function(data){});
            //xively.datastream.get
            var d = new Date(), now = d.toISOString();
            console.log("Now:"+now);
            xively.datastream.history('56185000', 'robot1-ldr', {"start":'2017-07-03T10:00:00.10Z', "end":now}, function(datastream){
                if(datastream.datapoints){
                    var data = {"id":'robot1-ldr', 
                    "value":parseInt(datastream.datapoints[datastream.datapoints.length-1].value, 10),
                    "at":datastream.datapoints[datastream.datapoints.length-1].at}; 
                    // Caso a requisisão seja de outro tempo, atualize o sistema
                    if(data.at != robots[0].at || robots[0].value != data.value){
                        console.log(data.value+'--'+robots[0].value);
                        console.log(data.at+'--'+robots[0].at);
                        robots[0].events = (robots[0].events == '#') ? parseInt(datastream.datapoints.length) : robots[0].events+1;
                        robots[0].value = parseInt(data.value, 10);
                        robots[0].at = data.at;
                        robots[0].per = Math.round10((robots[0].events/maxEvents) * 100, -1);
                        robots[0].bg = 
                            (robots[0].per < 25.0) ? 'c0' : 
                            (robots[0].per < 50.0) ? 'c25' :
                            (robots[0].per < 75.0) ? 'c50' :
                            (robots[0].per < 100.0) ? 'c75' : 'c100';
                    }
                    console.debug(robots[0]);
                }
            });
            console.log('------------');
        }, 5000);
	});
    
    //'https://api.xively.com/v2/feeds/56185000?key=KqdcJ7M2h2xd9URUn5fPiuGwoSGC8qNiMyPP0DYYhY5sDeUB'
	
    var maxEvents = 150;
	var robots = [
		{id:'1', locale:'1', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'2', locale:'2', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'3', locale:'3', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'4', locale:'4', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'5', locale:'5', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'6', locale:'6', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'7', locale:'7', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'8', locale:'8', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'9', locale:'9', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'10', locale:'10', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'11', locale:'11', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'12', locale:'12', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'13', locale:'13', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'14', locale:'14', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'15', locale:'15', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'16', locale:'16', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'17', locale:'17', per:'#', events:'#', bg:'cx', value:0, at:'#'},
		{id:'18', locale:'18', per:'#', events:'#', bg:'cx', value:0, at:'#'},
	];
	
})();