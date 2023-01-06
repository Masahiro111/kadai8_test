<x-app-layout>
    {{-- <div class="item-page-wrapper">
        <div class="item-wrapper prose">
            <div class="item-header">
                <div class="date">{{$post->created_at}}</div>
            </div>
            <div class="item-title">{{$post->title}}</div>
            <div class="item-tags">
                <div class="item-tag">{{$post->tag1}}</div>
                @if ($post->tag2)
                <div class="item-tag">{{$post->tag2}}</div>
                @endif

                @if ($post->tag3)
                <div class="item-tag">{{$post->tag3}}</div>
                @endif
            </div>
            <div class="item-body">{{$post->article}}</div>
        </div>
    </div> --}}

    <div class="relative overflow-hidden bg-white py-16">
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-prose text-lg">
                <h1>
                    <span class="block text-sm font-semibold text-indigo-600">&#64;{{$post->user->name}}</span>
                    <span class="block text-sm font-semibold text-indigo-600">投稿日：{{$post->created_at->format('Y 年m月d日')}}</span>
                    <span class="mt-2 mb-2 block font-bold leading-8 tracking-tight text-gray-900 sm:text-2xl">{{$post->title}}</span>
                    <small class="block mb-12">
                        <span class="item-tag">タグ： {{$post->tag1}}</span>
                        @if ($post->tag2)
                        <span class="item-tag">, {{$post->tag2}}</span>
                        @endif
                        @if ($post->tag3)
                        <span class="item-tag">, {{$post->tag3}}</span>
                        @endif
                    </small>
                </h1>
            </div>
            <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
                <div class="item-body">{{$post->article}}</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        $(window).on('load', function() {

            marked.setOptions({
                langPrefix: '',
                breaks : true,
                sanitize: true,
            });

            // $('#markdown_editor_textarea').keyup(function() {
            //     var html = marked.parse(getHtml($(this).val()));
            //     $('#markdown_preview').html(html);
            // });

            var target = $('.item-body')
            var html = marked.parse(getHtml(target.html()));
            $('.item-body').html(html);

            // 比較演算子が &lt; 等になるので置換
            function getHtml(html) {
                html = html.replace(/&lt;/g, '<');
                html = html.replace(/&gt;/g, '>');
                html = html.replace(/&amp;/g, '&');
                return html;
            }
        });
    </script>
</x-app-layout>