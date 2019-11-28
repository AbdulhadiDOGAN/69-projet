var mongodb = require("mongodb");
var client = mongodb.MongoClient;
var url = "mongodb://127.0.0.1:27017/";
var result = {};
client.connect(url,{useUnifiedTopology: true}, function (err, client) {
    var db = client.db("test");
    var collection = db.collection("Personne");
    var query = {};
    var i = 0;
    collection.find().toArray(function(err,result){
        if(err) throw err;
        for (var i = 0; i < result.length; i++) {
            console.log(result[i].nom);
            console.log(result[i].prenom);

            for (var j = 0; j < result[i].competences.length; j++) {
                console.log(result[i].competences[j]);
            }
            console.log(result[i].adresse.rue);
            console.log(result[i].adresse.ville);
            console.log(result[i].adresse.code_postale);
        }
        
    });  
    client.close();
});
