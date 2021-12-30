import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});
// node index.js

mongoClient.connect(async function (error, mongo) {
    try {
      let db = mongo.db('test')
      let coll = db.collection('users')
      let res = await coll.find().toArray()
      console.log(res)
    }
    catch (error) {
      console.log(error)
    }


})