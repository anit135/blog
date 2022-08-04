<section class="mb-4 mt-4">
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form-->
            <div class="mb-4 alert print_msg" style="display:none">
                <ul class="mb-0"></ul>
            </div>
            <form method="" action="" class="">
                @csrf
                <input type="hidden" name="article_id" id="article_id" value="{{ $article->id }}">
                <input type="text" name="title" id="title" class="form-control mb-3" placeholder="Comment title" required />
                <textarea class="form-control mb-3" name="body_comment" id="body_comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                <input type="submit" class="btn btn-success btn-submit" value="Send" />
            </form>
            <!-- Comment with nested comments-->
            @foreach($article->comments->sortDesc() as $comment)
            <div class="d-flex mt-4">
                <!-- Parent comment-->
                <div class="">
                    <div class="fw-bold">{{ $comment->title }}</div>
                    {{ $comment->body_comment }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script type="text/javascript">
    $(".btn-submit").click(function(e) {
        e.preventDefault();

        var article_id = $("#article_id").val();
        var title = $("#title").val();
        var body_comment = $("#body_comment").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('comment_send', $article->slug) }}",
            data: {
                _token: '{{csrf_token()}}',
                article_id: article_id,
                title: title,
                body_comment: body_comment
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    printMsg('success', data.success);
                } else {
                    printMsg('error', data.error);
                }
            }
        });
    });

    function printMsg(type, msg) {
        $(".print_msg").find("ul").html('');
        $(".print_msg").css('display', 'block');
        if (type == 'success') {
            $(".print_msg").addClass('alert-success');
            $(".print_msg").removeClass('alert-danger');
            $(".print_msg").find("ul").append('Your message has been sent successfully');
            $("form").css('display', 'none');
        } else if (type == 'error') {
            $(".print_msg").addClass('alert-danger');
            $.each(msg, function(key, value) {
                $(".print_msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    }
</script>