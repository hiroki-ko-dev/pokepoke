import React from 'react';
import styles from './ViewModal.module.scss'; // CSSモジュールのインポート
import UiModal from '@/components/uis/UiModal';

interface CreateFormProps {
  cardUrl: string;
  closeModal: () => void;
}

const ViewModal: React.FC<CreateFormProps> = ({
  cardUrl,
  closeModal,
}) => {

  return (
    <UiModal
      onClose={closeModal}
    >
      <div className={styles.modalCardContainer}>
        <img
          src={cardUrl}
          alt="Selected"
          className={styles.modalCard}
        />
      </div>
    </UiModal>
  );
};

export default ViewModal;
