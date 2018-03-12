$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#n').val($(this).data('name'));
          $('#s').val($(this).data('spesialis'));
          $('#l').val($(this).data('hp'));
          $('#e').val($(this).data('email'));
          $('#myModal').modal('show');
      });
      $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
  
      $('.modal-footer').on('click', '.edit', function() {
          $.ajax({
              type: 'post',
              url: '/editItem',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'nama_dokter': $('#n').val(),
                  'spesialis': $('#s').val(),
                  'noHp': $('#l').val(),
                  'email': $('#e').val()
              },
              success: function(data) {
                  //$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                  window.location = '/redirections';
              }
          });
      });

      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: '/addItem',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'name': $('input[name=name]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    $('.error').removeClass('hidden');
                      $('.error').text(data.errors.name);
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                  }
              },
  
          });
          $('#name').val('');
      });
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: '/deleteItem',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                  $('.item' + $('.did').text()).remove();
                  window.location = '/redirection';
              }
          });
      });

      $('select[name="id_Gedung"]').on('change', function() {
        var stateID = $(this).val();
        if(stateID) {
            $.ajax({
                url: '/tambahPasien/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                    
                    $('select[name="id_kamar"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="id_kamar"]').append('<option value="'+ data[key].id +'">'+ data[key].namaKamar +'</option>');
                    });
                    console.log(data[2].namaKamar);

                }
            });
        }else{
            $('select[name="kamar"]').empty();
        }
    });
  });
