<x-filament::page>
    <div class="space-y-6 mt-6">
        <form wire:submit.prevent="create" class="space-y-4">
            {{ $this->form }}

            <x-filament::button
                type="submit"
                wire:target="create"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed"
            >
                <span wire:loading.remove wire:target="create">Ajouter l'invité</span>
                <span wire:loading wire:target="create">Chargement...</span>
            </x-filament::button>
        </form>

        {{ $this->table }}
    </div>
</x-filament::page>
