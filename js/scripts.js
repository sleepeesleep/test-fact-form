$(function () {
  $(document).ready(function () {
    $.ajax({
      url: './moduls/select.php',
      type: 'POST',
      dataType: 'json',
      success: function (data) {
        if (data) {

          $('#table').prepend("<table class=\"table\"><thead><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Роль</th><th>Логин</th><th><th> </th></th></tr></thead><tbody id=\"table_1\">")
          $.each(data, function (value) {
            var id = data[value]['id'];
            var first_name = data[value]['first_name'];
            var last_name = data[value]['last_name'];
            var role = data[value]['role'];
            var login = data[value]['username'];
            $('#table_1').append("<tr><td>" + id + "</td><td>" + first_name + "</td><td>" + last_name + "</td><td>" + role + "</td><td>" + login + "</td><td><input name=\"record\" value=\"" + id + "\" type=\"checkbox\"></td></tr>");
          });
          $('#table').append("</tbody></table>")
        }
      }
    });
  });
  $(".delete-row").click(function () {
    $("table tbody").find('input[name="record"]').each(function () {
      if ($(this).is(":checked")) {
        $(this).parents("tr").remove();
        var id_del = ($(this).val());
        $.ajax({
          url: './moduls/remove.php',
          type: 'POST',
          dataType: 'json',
          data: { "id": id_del },
          success: function (data) {

          }
        })
      }
    });
  });

});
function call() {
  var msg = $('#formx').serialize();
  $.ajax({
    type: 'POST',
    url: './moduls/add.php',
    data: msg,
    success: function (data) {

      var data = JSON.parse(data);
      var id = data['id'];
      var first_name = data['first_name'];
      var last_name = data['last_name'];
      var role = data['role'];
      var login = data['username'];
      $('#table_1').append("<tr><td>" + id + "</td><td>" + first_name + "</td><td>" + last_name + "</td><td>" + role + "</td><td>" + login + "</td><td><input name=\"record\" value=\"" + id + "\" type=\"checkbox\"></td></tr>");
      $('#first_name').val('');
      $('#last_name').val('');
      $('#username').val('');
    },
    error: function (xhr, str) {
      alert('Возникла ошибка: ' + xhr.responseCode);
    }
  });

}
