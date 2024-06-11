<div x-data="{ open: false, title: '', eventId: '' }" @keydown.escape.window="open = false">
    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50" @click="open = false"></div>

        <div class="bg-white rounded-lg shadow-lg p-6 z-10 max-w-lg mx-auto">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5">
                <h1 class="text-xl font-semibold text-gray-900" x-text="title"></h1>
            </div>
            <!-- Modal content -->
            <div id="modal-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
