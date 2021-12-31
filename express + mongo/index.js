import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});
// node index.js

mongoClient.connect(async function (error, mongo) {

try {
  let coll = mongo.db('test').collection('prods')
  await coll.updateMany({}, {$set: {time: new Date().getTime()}})

}

catch (e) {
  console.log(e)
}














})