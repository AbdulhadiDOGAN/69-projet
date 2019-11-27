var mongodb = require("mongodb");
var client = mongodb.MongoClient;
var url = "mongodb://127.0.0.1:27017/";

client.connect(url,{useUnifiedTopology: true}, function (err, client) {
    
    var db = client.db("test");
    var collection = db.collection("Personne");
    
    var query = {};
    
    var cursor = collection.find(query);
    
    cursor.forEach(
        function(doc) {
            console.log(doc);
        }, 
        function(err) {
            client.close();
        }
    );    
});
