export default {
  '/handler/': function({get}) {
    console.log(get.num);
    return 'form data received';
  }
}