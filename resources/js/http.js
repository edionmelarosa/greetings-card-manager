export async function otherUsers() {
    return axios.get('/ajax/users');
}

export async function profile() {
    return axios.get('/ajax/profile');
}

/**
 * 
 * @param {object} formData 
 */
export async function sendCard(formData) {
    return axios.post('/ajax/cards/send', formData);
}