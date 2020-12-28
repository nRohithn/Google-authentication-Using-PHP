document.querySelector('#from1').addEventListener('submit', function(e) {
      var form = this;
      
      e.preventDefault();
      
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Shortlisted!',
              text: 'Candidates are successfully shortlisted!',
              icon: 'success'
            }).then(function() {
              form.submit();
            });
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    });


$(function() {
  $("#listPage").JPaging();
});

$(function() {
  $("#listPage").JPaging({
    pageSize: 15
  });
});


$(function() {
  $("#listPage").JPaging({
    visiblePageSize: 7
  });
});

   fetch('https://jsonplaceholder.typicode.com/users/')
                .then(response => response.json())
                .then(users => {
                    let output = '<h2>Lists of Users</h2>';
                    output += '<ul>';
                    users.forEach(function(user) {
                        output += `
                            <li>
                                ${user.name}
                            </li>
                        `;
                    });
                    output += '</ul>'
                    document.getElementById("response").innerHTML = output;
                });
        }
		
		
		
		
		
		
		
 
  
  