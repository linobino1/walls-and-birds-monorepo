import payload from 'payload';
import faq from './faq';

export const seedFaq = async () => {
    await payload.updateGlobal({
        slug: 'faq',
        data: {
            questions: faq.map((question) => ({
                question,
            })),
        },
    });
};
