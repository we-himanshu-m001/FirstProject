<script setup>
import {onMounted, ref, watch} from "vue";
import { useBlogStore } from '../../stores/store-blogs'

import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {useRoute} from 'vue-router';

import Textarea from 'primevue/textarea';
import FileUpload from 'primevue/fileupload';
import { useToast } from "primevue/usetoast";
const toast1 = useToast();



const store = useBlogStore();
store.setToast1(toast1);
const route = useRoute();

onMounted(async () => {
    if(route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }

    await store.getFormMenu();
});

//--------form_menu
const form_menu = ref();
const toggleFormMenu = (event) => {
    form_menu.value.toggle(event);
};
//--------/form_menu

</script>
<template>

    <div class="col-6" >

        <Panel class="is-small">

            <template class="p-1" #header>


                <div class="flex flex-row">
                    <div class="p-panel-title">
                        <span v-if="store.item && store.item.id">
                            Update
                        </span>
                        <span v-else>
                            Create
                        </span>
                    </div>

                </div>


            </template>

            <template #icons>


                <div class="p-inputgroup">

                    <Button class="p-button-sm"
                            v-if="store.item && store.item.id"
                            data-testid="blogs-view_item"
                            @click="store.toView(store.item)"
                            icon="pi pi-eye"/>

                    <Button label="Save"
                            class="p-button-sm"
                            v-if="store.item && store.item.id"
                            data-testid="blogs-save"
                            @click="store.itemAction('save')"
                            icon="pi pi-save"/>

                    <Button label="Create & New"
                            v-else
                            @click="store.itemAction('create-and-new')"
                            class="p-button-sm"
                            data-testid="blogs-create-and-new"
                            icon="pi pi-save"/>


                    <!--form_menu-->
                    <Button
                        type="button"
                        @click="toggleFormMenu"
                        class="p-button-sm"
                        data-testid="blogs-form-menu"
                        icon="pi pi-angle-down"
                        aria-haspopup="true"/>
                    <Menu ref="form_menu"
                          :model="store.form_menu_list"
                          :popup="true" />
                    <!--/form_menu-->


                    <Button class="p-button-primary p-button-sm"
                            icon="pi pi-times"
                            data-testid="blogs-to-list"
                            @click="store.toList()">
                    </Button>
                </div>



            </template>


            <div v-if="store.item" class="mt-2">

                <Message severity="error"
                         class="p-container-message mb-3"
                         :closable="false"
                         icon="pi pi-trash"
                         v-if="store.item.deleted_at">

                    <div class="flex align-items-center justify-content-between">

                        <div class="">
                            Deleted {{store.item.deleted_at}}
                        </div>

                        <div class="ml-3">
                            <Button label="Restore"
                                    class="p-button-sm"
                                    data-testid="articles-item-restore"
                                    @click="store.itemAction('restore')">
                            </Button>
                        </div>

                    </div>

                </Message>


                <VhField label="Name">
                    <InputText class="w-full"
                               name="blogs-name"
                               data-testid="blogs-name"
                               @update:modelValue="store.watchItem"
                               v-model="store.item.name"/>
                </VhField>

                <VhField label="Slug">
                    <InputText class="w-full"
                               name="blogs-slug"
                               data-testid="blogs-slug"
                               v-model="store.item.slug"/>
                </VhField>

                <VhField label="Description">
<!--                    <div class="card flex justify-content-center">-->
                        <Textarea class="w-full" v-model="store.item.description" autoResize rows="5"  />
<!--                    </div>-->

                </VhField>

                <VhField label="Image">
                    <div class="card">

                    <FileUpload name="image"

                                :custom-upload="true"
                                mode="advanced"
                                @uploader="store.upload"
                                :accept="store.formatted_fileTypes"
                                :multiple="true"
                                :maxFileSize="1000000">
                        <template #empty class="flex">
                            <p v-if="!store.item.image">Drag and drop files here to upload.</p>
                            <p v-if="store.item.image">
                                <img class="w-4 h-4rem" :src="`uploads/`+store.item.image"/>

                                <i class="pi pi-times text-2xl font-bold cursor-pointer text-red-500 ml-4" @click="store.clearimage"></i>
                            </p>


                        </template>
                    </FileUpload>
                    </div>

                </VhField>


                <VhField label="Is Active">
                    <InputSwitch v-bind:false-value="0"
                                 v-bind:true-value="1"
                                 class="p-inputswitch-sm"
                                 name="blogs-active"
                                 data-testid="blogs-active"
                                 v-model="store.item.is_active"/>
                </VhField>

            </div>
        </Panel>

    </div>

</template>

<style>
.p-fileupload .p-fileupload-buttonbar {
    display: flex;
    flex-wrap: nowrap;
    /*justify-content: space-between;*/

}
.p-fileupload .p-fileupload-buttonbar .p-button{
    color:white;
    background-color:#10b981;
}

</style>
