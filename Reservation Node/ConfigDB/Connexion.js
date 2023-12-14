const mongoose = require('mongoose');

const connectDB = async () => {
    try {
        await mongoose.connect(process.env.DB_URI, {
            useUnifiedTopology: true,
            useNewUrlParser: true
        });
        console.log('database connected');
    } catch (err) {
        console.log(err.message);

    }
}

module.exports = connectDB;
