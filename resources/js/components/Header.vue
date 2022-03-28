<template>
  <header>
    <nav>
      <div>
        <router-link class="logo" :to="{name: 'home'}">BoolPress</router-link>
      </div>
      <ul>
        <li><router-link class="my_router-link" :to="{name: 'home'}">HOME</router-link></li>
        <li><router-link class="my_router-link" :to="{name: 'about'}">CHI SIAMO</router-link></li>
      </ul>
    </nav>
  </header>
</template>

<script>

export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
header{
    height: 100px;
    background-color: rgb(0, 119, 255);
    display: flex;
    align-items: center;
    justify-content: center;
  nav{
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: rgb(255, 255, 255);
    width: 90%;
    div{
      .logo{
        font-size: 50px;
        text-decoration: none;
        color: rgb(255, 255, 255);
      }
    }
    ul{
      display: flex;
      justify-content: space-around;
      width: 300px;
      li{
        list-style: none;
        .my_router-link{
          text-decoration: none;
          font-weight: bold;
          color: rgb(255, 255, 255);
          padding: 15px;
          background-color: rgb(0, 85, 170);
          border-radius: 10px;
        }
      }
    }
  }
}
</style>