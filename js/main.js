$(document).ready(function () {


    // $('#signin').click(function () {
    //     var inname = $('#inname').val();
    //     var pass = $('#pass').val();
    //     var submit = $(this).val();
    //     $.ajax({
    //         url: './validation.php',
    //         type: 'post',
    //         data: {inname: inname, inpass: pass, signin: submit},
    //         success: function (e) {
    //             document.write(e);
    //         }
    //     });
    // });

    $('#logout').click(function () {
        var submit = $(this).val();
        $.ajax({
            url: './exit.php',
            type: 'post',
            data: {exit: submit}
        });
    });

    $('#show-signin').click(function () {
        $('.signin').css('left', '10%')
    });
    $('.close-form').click(function () {
        $('.signin').css('left', '-100%')
    });

    var unedited = $('.status:contains("0")');
    var edited = $('.status:contains("1")');
    unedited.text("unedited");
    edited.text("edited");
    unedited.css({
        'fontWeight': '500',
        'color': 'red',
        'text-align': 'center',
        'fontSize': '18px'
    });
    edited.css({
        'fontWeight': '500',
        'color': 'green',
        'text-align': 'center',
        'fontSize': '18px'
    });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    $('.task-send').click(function () {
        if ($('.textarea-task').val().length <= 1) {
            alert('Task is required')
        }
        if ($('.select-input').val().length <= 0) {
            alert('Username is required')
        }

    });
    $('.confirm-task').click(function () {
        var conf = $(this).val();
        $.ajax({
            url: './functions.php',
            type: 'post',
            data: {confirm: conf},
            success:function () {

            }
        });
    });
    $('.delete-icon').click(function () {
        $(this).css('display', 'none');
        $(this).next().css('display', 'block');
    });

    $('.delete-task-no').click(function () {
        $(this).parent().prev().css('display', 'block');
        $(this).parent().css('display', 'none');
    });

    var inputs = $('.select-input');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('change', function () {
            var optionFound = false,
                datalist = this.list;
            for (var j = 0; j < datalist.options.length; j++) {
                if (this.value == datalist.options[j].value) {
                    optionFound = true;
                    break;
                }
            }
            if (optionFound) {
                this.setCustomValidity('');
            } else {
                this.setCustomValidity('Please select a valid value.');
            }
        });
    }
    function sortlist() {
        var list, i, switching, b, shouldSwitch, dir, switchcount = 0;
        list = document.getElementById("id01");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        // Make a loop that will continue until no switching has been done:
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            b = list.getElementsByClassName("list");
            // Loop through all list-items:
            for (i = 0; i < (b.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Check if the next item should switch place with the current item,
                based on the sorting direction (asc or desc): */
                if (dir == "asc") {
                    if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
                        /* If next item is alphabetically lower than current item,
                        mark as a switch and break the loop: */
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (b[i].innerHTML.toLowerCase() < b[i + 1].innerHTML.toLowerCase()) {
                        /* If next item is alphabetically higher than current item,
                        mark as a switch and break the loop: */
                        shouldSwitch= true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                b[i].parentNode.insertBefore(b[i + 1], b[i]);
                switching = true;
                // Each time a switch is done, increase switchcount by 1:
                switchcount ++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
$(".sort").click(function () {
    sortlist();
});

});