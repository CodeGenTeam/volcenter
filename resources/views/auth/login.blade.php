<div id="admin-wrapper">
	<h2>Вход</h2>

	<div id="events-wrapepr" ng-controller="loginCtrl" >
		<form class="form reg" name="form1" >
			<label>Почта</label>
			<input class="form-control input1" ng-model="user.email" name="email" required>

			<label>Пароль</label>
			<input type="password" class="form-control input1" ng-model="user.password" required>

			<input class="button button-color-2 input-button" type="submit"
				   ng-disabled="form1.$invalid" ng-click="checkData()">
			<p ng-show="error" class="help-block" style="color: #a94442">{{errorTxt}}</p>
		</form>
	</div>

</div>