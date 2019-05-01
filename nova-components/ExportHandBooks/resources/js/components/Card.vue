<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h4 class="text-center text-3xl text-80 font-light">Експорт Облікових данних</h4>
            <form method="get" action="/export-handbooks" ref="form" style="margin-left: 27%">
                <button
                        :disabled="working"
                        type="submit"
                        class="btn btn-default btn-primary ml-auto mt-auto"
                >
                    <loader v-if="working" width="30"></loader>
                    <span v-else>{{__('Export')}}</span>
                </button>
            </form>
        </div>
    </card>
</template>
