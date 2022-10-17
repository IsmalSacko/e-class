<template>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste d'étudiants</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <Create/>
                            </h3>
                            <div class="card-tools">
                                <Pagination
                                    :links="props.etudiants.links"
                                    :prev="props.etudiants.prev_page_url"
                                    :next="props.etudiants.next_page_url" />
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Sexe</th>
                                    <th>Age</th>
                                    <th>Niveau Scolaire</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for=" etudiant in props.etudiants.data">

                                    <td>{{etudiant.nom}}</td>
                                    <td>{{etudiant.prenom}}</td>
                                    <td>{{etudiant.sexe}}</td>
                                    <td>{{etudiant.age}}</td>
                                    <td>{{etudiant.niveau_scolaire_id}}e</td>
                                    <td >
                                        <div class="d-flex">
                                            <button class="btn btn-primary  mr-2">
                                                <i class="fas fa-pen nav-icon "></i>
                                            </button>
                                            <button class="btn btn-danger ">
                                                <i class="fas fa-trash nav-icon"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

</template>
<script setup>
    import Pagination from '../../Shared/Pagination'
    import Create from "../Etudiant/create";
    const props = defineProps({
        etudiants: Object
    })
</script>
