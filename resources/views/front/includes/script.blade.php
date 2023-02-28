<!-- jQery -->
<script src="{{asset('/')}}front-assets/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="{{asset('/')}}front-assets/js/popper.min.js"></script>


<!-- bootstrap js -->
<script src="{{asset('/')}}front-assets/js/bootstrap.js"></script>
<script src="{{asset('/')}}front-assets/js/datatables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- custom js -->
<script src="{{asset('/')}}front-assets/js/custom.js"></script>

@stack('js')

{{--datatable--}}
<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>

{{--click replt btn show a textarea box--}}
<script type="text/javascript">



    function reply(caller) {
        document.getElementById('commentId').value=$(caller).attr('data-CommentId');


        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }

    function reply_close(caller) {
        $('.replyDiv').hide();

    }
</script>


{{--Refresh Page and Keep Scroll Position--}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

//search product
<script>
    $(document).on('keyup',function (e) {
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url:"{{ route('search-product') }}",
            method:'GET',
            data:{search_string:search_string},
            success:function (res) {
                $('.table-data').html

            }
        })
    })
</script>
