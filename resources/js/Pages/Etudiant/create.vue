<template >

    <button class="btn btn-primary" data-toggle="modal" data-target="#createNVModal">
        <i class="fa fa-plus"></i> Nouveau
    </button>
    <div
        class="modal fade bg-dark text-white"
        id="createNVModal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true" style="padding-top: 100px;"
    >
    <div class="odal-dialog modal-lg m-auto ">
    <form @submit.prevent="form.post('/login')" class="form-group">
       <div class="mb-2">
           <!-- nom -->
           <label>Nom</label>
           <input type="text" v-model="form.nom" class="form-control">
           <div v-if="form.errors.email">{{ form.errors.nom }}</div>
       </div><div class="mb-2">
           <!-- prenom -->
           <label>Prénom</label>
           <input type="text" v-model="form.prenom" class="form-control">
           <div v-if="form.errors.email">{{ form.errors.prenom }}</div>
       </div>
        <div class="mb-2">
           <!-- sexe -->
           <label>Sexe</label>
           <input type="text" v-model="form.sexe" class="form-control">
           <div v-if="form.errors.email">{{ form.errors.sexe }}</div>
       </div>
        <div class="mb-2">
           <!-- age -->
           <label>Age</label>
           <input type="number" v-model="form.nom" class="form-control">
           <div v-if="form.errors.email">{{ form.errors.nom }}</div>
       </div>
        <!-- niveau_scolaire_id -->
        <div class="mb-2">
            <label class="mr-2">Niveau scolaire</label>
            <select class="form-select" aria-label="Default select example">
                <option selected ></option>

            </select>

       </div>
        <!-- submit -->
        <div class="">
            <button class="btn btn-primary" type="submit" :disabled="form.processing">Login</button>
        </div>
    </form>
    </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'


export default {

    setup () {

        const form = useForm({
            email: null,
            password: null,
            remember: false,
        })

        return { form }
    },
}
</script>
