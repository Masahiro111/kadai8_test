<x-app-layout>
    <div class="p-4">
        <form class="post-page-wrapper" action="/drafts/new" method="post">
            @csrf
            <input
                   type="text"
                   class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   id="title-input"
                   placeholder="タイトル"
                   name="title">
            <input
                   type="text"
                   class="mb-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   placeholder="プログラミング技術に関するタグをスペース区切りで3つまで入力"
                   name="tags">
            <div class="flex border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <div class="w-1/2 h-auto">
                    <textarea
                              name="article"
                              id="markdown_editor_textarea"
                              cols="30"
                              rows="10"
                              class="w-full"></textarea>
                </div>
                <div class="w-1/2 h-auto bg-white">
                    <div id="markdown_preview"></div>
                </div>
            </div>
            <div class="post-page-footer">
                <input type="submit" class="post-button m-1" value="Qiitaに投稿">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        $(function() {

            // marked.setOptions({
            //     langPrefix: '',
            //     breaks : true,
            //     sanitize: true,
            // });

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