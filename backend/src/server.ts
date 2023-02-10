import bodyParser from 'body-parser';
import express from 'express';
import payload from 'payload';
import { seedFaq } from './seed';

require('dotenv').config();
const app = express();

// Redirect root to Admin panel
app.get('/', (_, res) => {
  res.redirect('/admin');
});

// Initialize Payload
payload.init({
  secret: process.env.PAYLOAD_SECRET,
  mongoURL: process.env.MONGODB_URI,
  express: app,
  onInit: () => {
    payload.logger.info(`Payload Admin URL: ${payload.getAdminURL()}`)
  },
})

// Seeding route
app.use(bodyParser.json())
app.post('/seed/faq', async (req, res) => {
  if (
    req.headers['content-type'] === 'application/json'
    && req.body?.key === process.env.ADMIN_KEY
  ) {
    try {
      await seedFaq();
      res.send("OK");
    } catch (err) {
      res.send(`Seeding failed: ${err}`);
    }
  } else {
    res.send("key missing");
  }
})

app.listen(3000);
