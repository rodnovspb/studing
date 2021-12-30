import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});
// node index.js

mongoClient.connect(async function (error, mongo) {

      let db = mongo.db('test')
      let coll = db.collection('users')
      coll.find().toArray().then(res=>{
        console.log(res)
      }).catch(e=>{
        console.log(e)
      })







})