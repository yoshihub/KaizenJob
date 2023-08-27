import { watchEffect } from 'vue';
import { useToast } from 'vue-toast-notification';
import { usePage } from '@inertiajs/vue3';

export function useFlashToast() {
    const toast = useToast();
    const { flash } = usePage().props;

    watchEffect(() => {
        if (flash.success) {
            toast.open({
                message: flash.success,
                type: 'success',
                position: 'top-right',
                duration: 3000,
                dismissible: true,
            });
        }
        if (flash.error) {
            toast.open({
                message: flash.error,
                type: 'error',
                position: 'top-right',
                duration: 3000,
                dismissible: true,
            });
        }
    });
}
