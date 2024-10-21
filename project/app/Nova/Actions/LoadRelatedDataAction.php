<?php
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class LoadRelatedData extends Action
{
    public function handle(ActionFields $fields, Collection $models)
    {
        // No database changes needed here.
    }

    public function fields()
    {
        return [
            Hidden::make('resourceId')->withMeta(['extraAttributes' => [
                'id' => 'related-data-resource-id'
            ]]),
        ];
    }

    public function js()
    {
        return <<<'JS'
            Nova.booting((Vue, router, store) => {
                Vue.component('load-related-data', {
                    props: ['resourceName', 'resourceId'],
                    mounted() {
                        this.$nextTick(() => {
                            document.getElementById('load-related-data-button').addEventListener('click', () => {
                                Nova.request().get('/nova-vendor/your-package/load-related-data', {
                                    params: {
                                        resourceId: this.resourceId,
                                        resourceName: this.resourceName,
                                    }
                                }).then(response => {
                                    // Handle response
                                });
                            });
                        });
                    },
                    template: `
                        <button type="button" id="load-related-data-button">Load Related Data</button>
                    `
                });
            });
        JS;
    }
}
