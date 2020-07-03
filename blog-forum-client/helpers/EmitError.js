const emitError = errors => {
    if (!errors.data || typeof errors.data !== 'object') {
        return {
            error: 'Something went wrong. Please try again.'
        }
    }

    if (errors.data.errors) {
        return {
            ...errors.data.errors
        }
    }

    if (errors.data.message) {
        return {
            error: errors.data.message
        }
    }

    return {
        ...errors.data
    }
}

export default emitError;