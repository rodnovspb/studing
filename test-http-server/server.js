export default {
  '/handler/': function ({post}) {
      return (~~post.a + ~~post.b +~~post.c)/3
  }
}