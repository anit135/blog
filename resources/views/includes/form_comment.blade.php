<section class="mb-4 mt-4">
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form-->
            <div class="mb-4 alert print_msg" style="display:none">
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
            url: "{{ route('comment.store') }}",
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
            },
            error: function(jqXhr, textStatus, errorMessage) {
                printMsg('error', errorMessage);
                // console.log(jqXhr.responseJSON.message);
            }
        });
    });

    function printMsg(type, msg) {
        $(".print_msg").html('');
        $(".print_msg").css('display', 'block');
        if (type == 'success') {
            $(".print_msg").addClass('alert-success');
            $(".print_msg").removeClass('alert-danger');
            $(".print_msg").append(msg);
            $("form").css('display', 'none');
        } else if (type == 'error') {
            $(".print_msg").addClass('alert-danger');
            if (msg.constructor === Array) {
                $(".print_msg").append('<ul class="mb-0">');
                $.each(msg, function(key, value) {
                    $(".print_msg").find("ul").append('<li>' + value + '</li>');
                });
                $(".print_msg").append('</ul>');
            } else {
                $(".print_msg").append(msg);
            }
        }
    }
</script>