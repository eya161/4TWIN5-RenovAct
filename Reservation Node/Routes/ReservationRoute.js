const express = require('express')
const router = express.Router()

const Reservation = require('../Models/Reservation')

// @route GET api/reservation
// @desc Get all reservation
router.get('/', async (req, res) => {
    try {
        const reservation = await Reservation.find();
        res.json(reservation);
    } catch (err) {
        console.error(err.message);
        res.status(500).send('Server Error');
    }
});

router.get('/hello', async (req, res) => {
    try {
        res.send('hello');
    } catch (err) {
        console.error(err.message);
        res.status(500).send('Server Error');
    }
})

router.post('/add', async (req, res) => {
    const resFound = req.body;
    try {
        const newReservation = new Reservation({...resFound});
        const reservation = await newReservation.save();
        res.status(201).send({success : {msg:"Reservation created successfuly" , reservation}});
    } catch (err) {
        res.status(400).send({errors : [{msg: err.message}]});
    }
})

router.post('/ajout', async (req, res) => {
    try {
        const newReservation = new Reservation({...req.body});
        const reservation = await newReservation.save();
        res.status(201).send({success : {msg:"Reservation created successfuly" , reservation}});
    } catch (err) {
        res.status(400).send({errors : [{msg: err.message}]});
    }
})


router.put('/update/:_id' , async (req , res) => {
        const {_id} = req.params;
        const resFound = req.body;
    try {
        const updatedRes = await Reservation.updateOne({_id} , {$set:resFound });
        res.status(200).send({success:{msg:"Reservation updated successfuly" , updatedRes}});
    } catch (error) {
        res.status(400).send({errors : [{msg:error.message}]});
    }
})

router.delete('/delete/:_id' , async (req , res) => {
const {_id} = req.params;
    try {
        const deletedReservation = await Reservation.findOneAndDelete({_id});
        res.status(200).send({success:{msg:"Reservation deleted successfuly" , deletedReservation}});

}   catch (error) {
        res.status(400).send({errors : [{msg:error.message}]});
}
})

router.get('/:_id' , async (req , res) => {
    const {_id} = req.params;
    try {
        const reservation = await Reservation.findById({_id});
        if(!reservation){
            return res.status(400).send({errors : [{msg:"Reservation not found"}]});
        }
        res.status(200).send({success:{msg:"Reservation found successfuly" , reservation}});

    } catch (error) {
        res.status(400).send({errors : [{msg:error.message}]});
    }
})

module.exports = router;
