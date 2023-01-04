<x-app-layout>
    <div class="p-4">
        <form class="post-page-wrapper" action="{{ route('drafts.store') }}" method="post">
            @csrf
            <input
                   type="text"
                   class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="title-input"
                   placeholder="タイトル"
                   name="title"
                   value="{{ old('title', $draft->title ?? '') }}">
            @error('title')
            <div class="validation">{{ $message }}</div>
            @enderror
            <input
                   type="text"
                   class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   placeholder="プログラミング技術に関するタグをスペース区切りで3つまで入力"
                   name="tags"
                   value="{{ old('tags', $draft->tags ?? '') }}">
            @error('tags')
            <div class="validation">{{ $message }}</div>
            @enderror
            <div class="border-gray-300 rounded-md border shadow-sm sm:text-sm">
                <div class="flex w-full">
                    <div class="w-1/2">
                        <textarea
                                  name="article"
                                  id="markdown_editor_textarea"
                                  cols="30"
                                  rows="10"
                                  style="height: 450px"
                                  class="w-full border-none overflow-y-scroll resize-none hover:border-none"
                                  placeholder="エンジニアに関する知識を Markdown 記法で書いて共有しよう">{{ old('article', $draft->article ?? '') }}</textarea>
                    </div>
                    <div class="w-1/2 h-auto bg-white overflow-y-scroll">
                        <div
                             id="markdown_preview"
                             class="prose p-8"
                             style="height: 450px">
                        </div>
                    </div>
                </div>
                @error('article')
                <div class="validation">{{ $message }}</div>
                @enderror
            </div>
            <div class="post-page-footer">
                <input type="submit" class="post-button m-1" value="Qiitaに投稿">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        $(window).on('load', function() {

            // marked.setOptions({
            //     langPrefix: '',
            //     breaks : true,
            //     sanitize: true,
            // });
            var target = $('#markdown_editor_textarea')
            var html = marked.parse(getHtml(target.html()));
            $('#markdown_preview').html(html);

            $('#markdown_editor_textarea').keyup(function() {
                var html = marked.parse(getHtml($(this).val()));
                $('#markdown_preview').html(html);
            });

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