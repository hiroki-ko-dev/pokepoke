import React from 'react';
import styles from './UiToast.module.scss';

interface UiToastProps {
  message: string;
  type: 'success' | 'error';
  onClose: () => void;
}

const UiToast: React.FC<UiToastProps> = ({ 
  message,
  type,
  onClose
}) => {
  return (
    <div className={styles.modal}>
      <div className={styles.modalPanel}>
        <div onClick={onClose} className={styles.closeButton} aria-label="閉じる">
          ×
        </div>
        {message}
      </div>
    </div>
  );
};

export default UiToast;
