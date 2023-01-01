<x-app-layout>
    <div class="p-4">
        <form class="post-page-wrapper" action="/drafts/new" method="post">
            @csrf
            <input type="text" class="block w-full mb-2" id="title-input" placeholder="タイトル" name="title">
            <input type="text" class="block w-full mb-2" placeholder="プログラミング技術に関するタグをスペース区切りで3つまで入力" name="tags">
            <div class="row">
                <div class="">
                    <textarea
                              name="article"
                              id="markdown_editor_textarea"
                              cols="30"
                              rows="10"
                              class="w-full"></textarea>
                </div>
                <div class="">
                    <div id="markdown_preview"></div>
                </div>
            </div>
            <div class="post-page-footer">
                <input type="submit" class="post-button m-1" value="Qiitaに投稿">
            </div>
        </form>
    </div>
</x-app-layout>