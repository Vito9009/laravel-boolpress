<template>
  <body>
      <Header />
      <Main />
      <Footer />
  </body>
</template>

<script>
import Header from './components/Header';
import Main from './components/Main';
import Footer from './components/Footer';

export default {
    name: "App",
    components: {
        Header,
        Main,
        Footer
    }
}
</script>

<style lang="scss">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;

    body{
        background-color: rgb(235, 235, 235);
}
}

</style>