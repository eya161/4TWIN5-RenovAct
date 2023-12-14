const mongoose = require('mongoose');

const ReservationSchema = new mongoose.Schema({

    anneeUniversitaire: String,
    valide:Boolean,
    nomEtudiant: String,
},
{
    timestamps: true
}
);

module.exports = Reservation = mongoose.model('reservation', ReservationSchema);
