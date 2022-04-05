import useObjectHelper from '@/composables/useObjectHelper';
import { computed, reactive, ref } from 'vue';

export default function useModal() {
  const showModal = ref(false);
  const selectedValue = reactive({});
  const mode = computed(() => {
    if (selectedValue?.id) {
      return 'Edit';
    }

    return 'Add';
  });

  function toggleModal(value = null) {
    const { resetObject } = useObjectHelper();
    const body = document.body;

    if (value) {
      Object.assign(selectedValue, value);
    } else {
      resetObject(selectedValue);
    }

    if (showModal.value === false) {
      body.style.overflowY = 'hidden';
    } else {
      body.style.overflowY = 'auto';
    }

    showModal.value = !showModal.value;
  }

  return {
    showModal,
    selectedValue,
    mode,
    toggleModal
  };
}
