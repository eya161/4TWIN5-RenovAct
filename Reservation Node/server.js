const express = require('express')
const app = express()
app.use(express.json())
const connect = require('./ConfigDB/Connexion')
require('dotenv').config()
const PORT = process.env.PORT || 7999
app.listen(PORT, () => {
    console.log(`server started on port ${PORT}`);
});
connect();
app.use('/api/reservation', require('./Routes/ReservationRoute'))

