<div class="container bg-primary" style="border-radius: 3px;">
<h1 class="text-center">Лучшие волонтёры этого месяца</h1>
  <div class="row">
  <div class="flexslider">
    <ul class="slides">
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption">Вася Пупкин <br><b>100 Баллов</b></p>
      </li>
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption">Илья Квасов <br><b>90 Баллов</b></p>
      </li>
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption">Вася Сосидж <br><b>80 Баллов</b></p>
      </li>
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption"> Саша Кофе <br><b>70 Баллов</b></p>
      </li>
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption"> Стёпа Триночи <br><b>60 Баллов</b></p>
      </li>
      <li>
        <img src="/bin/img/no-image.png" />
        <p class="flex-caption">Лёша Мозговзрыв <br><b>10 Баллов</b></p>
      </li>
    </ul>
    </div>
  </div>
</div>
<style type="text/css">
.flex-caption {
  width: 96%;
  padding: 2%;
  left: 0;
  bottom: 0;
  background: rgba(0,0,0,.5);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0,0,0,.3);
  font-size: 14px;
  line-height: 18px;
}
.flexslider {
  margin-top: 10px;
  margin-left: 10px;
  margin-right: 10px;
}
</style>
<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5
  });
});
</script>