<template>
    <div class="app-wrap">
        <div class="editor-wrap">
            <div id="gjs"></div>
        </div>
    </div>
</template>

<script>

import grapesjs from "grapesjs";
import 'grapesjs/dist/css/grapes.min.css'
import gjsPreset from 'grapesjs-preset-webpage'
import gjsBlocks from 'grapesjs-blocks-basic'

let editor;
let pm;

export default {
    el: '.pages-wrp',
    name: 'GjsEditor',
    props: ['blockId', 'loadUrl', 'saveUrl', 'assetUrl'],

    mounted() {
        const pageId = 'page-1';

        editor = grapesjs.init({
            container: '#gjs',
            height: '900px',
            fromElement: true,
            plugins: [
                editor => gjsPreset(editor, {}),
                editor => gjsBlocks(editor, {}),
            ],
            pageManager: {
                pages: [{
                    id: pageId,
                    name: 'Bloco',
                }]
            },
            canvas: {
                scripts: ['https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'],
                styles: ['https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css'],
            },
            storageManager: {
                type: 'remote',
                stepsBeforeSave: 1,
                options: {
                    remote: {
                        urlLoad: this.loadUrl,
                        urlStore: this.saveUrl,

                        fetchOptions: opts => (opts.method === 'POST' ? {method: 'PUT'} : {}),

                        onStore: (data, editor) => {
                            editor.Pages.getAll().map(page => console.log(page.getId()))
                            const pageHtml = editor.Pages.get(pageId)
                            const component = pageHtml.getMainComponent();
                            return {
                                data,
                                html: editor.getHtml({component}),
                                css: editor.getCss({component})
                            };
                        },

                        onLoad: result => result.data,
                    }
                }
            },
            assetManager:{
                upload: this.assetUrl,
            }

        });
    },
}
</script>

<style scoped>
body, html {
    height: 100%;
    margin: 0;
}

.app-wrap {
    height: 100%;
    width: 100%;
    display: flex;
}

.editor-wrap {
    widtH: 100%;
    height: 100%;
}


</style>
