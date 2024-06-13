<div>
    <div x-data="{ isEditing:  @entangle('isEditing'), content: @entangle('avisoContent') }">
        <div x-show="!isEditing">
            <div class="flex flex-col items-center mt-6">
                <x-button @click="isEditing = true"><i class="fa fa-pencil mr-2"></i> Editar</x-button>
            </div>
            <div x-html="content"></div>
        </div>
        <div x-show="isEditing" style="display:none">
            <div wire:ignore class="form-group row">
                <label class="col-md-3 col-form-label" for="message">Editar Aviso Legal</label>
                <div class="col-md-9">
                    <textarea wire:model="avisoContent" class="form-control required" id="editor2">{{$avisoContent}}</textarea>
                </div>
            </div>
            <div class="flex flex-col items-center mt-6">
                <x-button wire:click="saveavisoContent()"><i class="fa fa-save mr-2"></i>Guardar</x-button>
            </div>
        </div>
    </div>


    @push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .then(editor => {
                editor.model.document.on('change:data', () => {
                    content = editor.getData();
                    @this.set('avisoContent', editor.getData());
                });
            })
        .catch( error => {
            console.error( error );
        } );
    </script>
    @endpush
</div>
