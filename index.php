<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</head>
<div class="pad_1pr">
  <div id="table">
  </div>
  <div class="pad_1pr">
    <button type="button" class="delete-row" id="btn_del">Удалить выбранные записи</button>
  </div>
  <div class="pad_1pr">
    <form method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" pattern="[A-Za-zА-Яа-яЁё]{3,12}" id="first_name" name="first_name" placeholder="Имя">
        </div>
        <div class="col">
          <input type="text" class="form-control" pattern="[A-Za-zА-Яа-яЁё]{3,12}" id="last_name" name="last_name" placeholder="Фамилия">
        </div>
        <div class="col">
          <select id="inputState" class="form-control" id="role" name="role">
            <option selected>user</option>
            <option>admin</option>
          </select>
        </div>
        <div class="col">
          <input type="text" class="form-control" pattern="^[a-zA-Z-0-9]+$" id="username" name="username" placeholder="Логин">
        </div>

      </div>
      <div class="row pad_1pr">
        <input value="Send" type="submit">
      </div>
    </form>


  </div>
</div>