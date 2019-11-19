<template>
    <div id="citizenView">
        <div class="mt-6  rounded overflow-hidden shadow-lg" v-if="citizen">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-4">{{ citizen.last_name }} {{ citizen.first_name }} {{ citizen.patronymic_name }}</div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дата Народження</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.birthDay }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Телефон</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.phone }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Телефон (дод.)</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.add_phone }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12"># посв</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.certificate_number }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Список</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.type_list }}</div>
                </div>
                <div class="flex -mb-3" v-if="this.citizen.type_list && this.citizen.list_reason">
                    <div class="w-1/3 bg-grey-light h-12">Повідомлення</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.list_reason }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Комментар</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.comment }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Категорії </div>

                <div class="flex -mb-3" v-if="citizen.search_categories.length" v-for="category in citizen.search_categories">
                    <div class="w-1/3 bg-grey-light h-12"></div>
                    <div class="w-1/3 bg-grey h-12"></div>
                    <div class="w-1/3 bg-grey-light h-12">{{ category }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Статуси </div>

                <div class="flex -mb-3" v-if="citizen.statuses.length" v-for="status in citizen.statuses">
                    <div class="w-1/3 bg-grey-light h-12"></div>
                    <div class="w-1/3 bg-grey h-12"></div>
                    <div class="w-1/3 bg-grey-light h-12">{{ status }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Адресса </div>

                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Громадська приймальня</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.office }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дільниця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.elective_plot }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Bулиця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.street }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дім</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.house }}</div>
                </div>
                <div class="flex -mb-3" v-if="citizen.flat">
                    <div class="w-1/3 bg-grey-light h-12">Квартира</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.flat }}</div>
                </div>
                <div class="flex -mb-3" v-if="citizen.entrance">
                    <div class="w-1/3 bg-grey-light h-12">Під'їзд</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.entrance }}</div>
                </div>
                <div class="flex -mb-3" v-if="citizen.floor">
                    <div class="w-1/3 bg-grey-light h-12">Поверх</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.floor }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'citizenView',
        props: [ 'citizen'],
        mounted() {
        }
    }
</script>