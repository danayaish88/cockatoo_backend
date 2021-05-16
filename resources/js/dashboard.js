
$(function (){
    var $users = $('#users');
    $("#users").empty();
    $.ajax({
        type:'GET',
        url: '/users-count',
        success: function(count){
            $users.append(`
                    <div id="users">
                        <div class="numbers">` + count + `</div>
                        <div class="cardName">Users</div>
                    </div>
            `);
        }
    });
});


$(function (){
    var $stories = $('#stories');
    $("#stories").empty();
    $.ajax({
        type:'GET',
        url: '/stories-count',
        success: function(count){
            $stories.append(`
                    <div id="stories">
                        <div class="numbers">` + count + `</div>
                        <div class="cardName">Stories</div>
                    </div>
            `);
        }
    });
});


$(function (){
    var $images = $('#images');
    $("#images").empty();
    $.ajax({
        type:'GET',
        url: '/images-count',
        success: function(count){
            $images.append(`
                    <div id="images">
                        <div class="numbers">` + count + `</div>
                        <div class="cardName">Images</div>
                    </div>
            `);
        }
    });
});

$(function (){
    var $bookmarks = $('#bookmarks');
    $("#bookmarks").empty();
    $.ajax({
        type:'GET',
        url: '/bookmarks-count',
        success: function(count){
            $bookmarks.append(`
                    <div id="bookmarks">
                        <div class="numbers">` + count + `</div>
                        <div class="cardName">Bookmarks</div>
                    </div>
            `);
        }
    });
});


$(function (){
    var $recentUsers = $('#recentUsers');
    $("#recentUsers").empty();
    $.ajax({
        type:'GET',
        url: '/last-five-users',
        success: function(data){
            $.each(data.data, function(i, user){
                
                $recentUsers.append(` 
                    <tr>
                        <td width="60px"> <div class="imgBx"><img src="http://127.0.0.1:8000/images/piza3.jpg"></div></td>
                        <td><h4>` + user.name + `<br><span>` +user.country + `</span></h4></td>
                    </tr> 
                `);
            },)
        }
    });
});

$(function (){
    var ctx = document.getElementById('myChart').getContext('2d');
    $.ajax({
        type:'GET',
        url: '/get-countries',
        success: function(result){
            var labels = [];
            var data = [];
            var colors = [];
            $.each(result, function(i, country){
                labels.push(country.country);
                data.push(country.count);
                colors.push(getRandomColor());
            })
            
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                      datasets: [{
                        label: 'Users distribution',
                        data: data,
                        hoverOffset: 4,
                        backgroundColor: colors,
                      }]
                }
            });
        }
    });
});

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
