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
                    <div class="w-1/3 bg-grey-light h-12">Категория</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.category }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12"># посв</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.certificate_number }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Чорний список</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.black_list }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Комментар</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.comment }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Адресса </div>

                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Громадська приймальня</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.office }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дільниця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.elective_plot }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Bулиця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.street }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дім</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.house }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Квартира</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.flat }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Під'їзд</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.entrance }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Поверх</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.floor }}</div>
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